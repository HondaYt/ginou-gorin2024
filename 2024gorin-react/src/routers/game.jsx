import { useState, useEffect, useCallback } from "react";
import { useSearchParams, useNavigate } from "react-router-dom";
import styles from "../styles/game.module.css";
import { api } from "../api/client";

const OBJECTS = {
	0: { name: "empty", img: "./ground.png" },
	1: { name: "wall", img: "./wall.png" },
	2: { name: "char", img: "./char.png" },
	3: { name: "box", img: "./box.png" },
	4: { name: "goal", img: "./goal.png" },
};

const MOVES = {
	ArrowUp: { row: -1, col: 0 },
	ArrowDown: { row: 1, col: 0 },
	ArrowLeft: { row: 0, col: -1 },
	ArrowRight: { row: 0, col: 1 },
};

export default function Game() {
	const [searchParams] = useSearchParams();
	const level = searchParams.get("level") || "1";
	const [field, setField] = useState(null);
	const [charPos, setCharPos] = useState(null);
	const [elapsedTime, setElapsedTime] = useState(0);
	const navigate = useNavigate();

	useEffect(() => {
		const fetchField = async () => {
			try {
				const data = await api.game.getField(level);
				setField(data.objects);
				for (let i = 0; i < data.objects.length; i++) {
					const j = data.objects[i].indexOf(2);
					if (j !== -1) {
						setCharPos({ row: i, col: j });
						break;
					}
				}
			} catch (err) {
				console.error("エラー:", err);
			}
		};
		fetchField();
	}, [level]);

	useEffect(() => {
		const timer = setInterval(() => {
			setElapsedTime((prev) => prev + 1);
		}, 1000);

		return () => clearInterval(timer);
	}, []);

	const handleGoal = useCallback(async () => {
		try {
			await api.game.submitResult(Number.parseInt(level), elapsedTime);
			alert(
				`クリア！経過時間: ${Math.floor(elapsedTime / 60)}:${(elapsedTime % 60).toString().padStart(2, "0")}`,
			);
			navigate("/clear");
		} catch (error) {
			console.error("結果の投稿に失敗:", error);
			alert("スコアの保存に失敗しました。");
		}
	}, [level, elapsedTime, navigate]);

	useEffect(() => {
		if (!field || !charPos) return;

		const handleMove = (e) => {
			const move = MOVES[e.key];
			if (!move) return;

			const newPos = {
				row: charPos.row + move.row,
				col: charPos.col + move.col,
			};

			if (
				newPos.row < 0 ||
				newPos.row >= field.length ||
				newPos.col < 0 ||
				newPos.col >= field[0].length ||
				field[newPos.row][newPos.col] === 1
			)
				return;

			const newField = field.map((row) => [...row]);
			newField[charPos.row][charPos.col] = 0;

			if (field[newPos.row][newPos.col] === 3) {
				const boxNewPos = {
					row: newPos.row + move.row,
					col: newPos.col + move.col,
				};

				if (
					boxNewPos.row >= 0 &&
					boxNewPos.row < field.length &&
					boxNewPos.col >= 0 &&
					boxNewPos.col < field[0].length &&
					![1, 3].includes(field[boxNewPos.row][boxNewPos.col])
				) {
					if (field[boxNewPos.row][boxNewPos.col] === 4) {
						alert("gameOver");
						window.location.reload();
					}
					newField[boxNewPos.row][boxNewPos.col] = 3;
					newField[newPos.row][newPos.col] = 2;
					setField(newField);
					setCharPos(newPos);
				}
				return;
			}

			if (field[newPos.row][newPos.col] === 4) {
				handleGoal();
			}
			newField[newPos.row][newPos.col] = 2;
			setField(newField);
			setCharPos(newPos);
		};

		window.addEventListener("keydown", handleMove);
		return () => window.removeEventListener("keydown", handleMove);
	}, [charPos, field, handleGoal]);

	if (!field)
		return (
			<main>
				<div>ローディング中...</div>
			</main>
		);

	return (
		<main>
			<div className={styles.timer}>
				{Math.floor(elapsedTime / 60)}:
				{(elapsedTime % 60).toString().padStart(2, "0")}
			</div>
			<div className={styles.map}>
				{field.map((row, i) =>
					row.map((cell, j) => (
						<div
							key={`${i}-${j}-${cell}`}
							id={cell === 2 ? "char" : null}
							className={styles.cell}
							style={{ gridRow: i + 1, gridColumn: j + 1 }}
						>
							<img src={OBJECTS[cell].img} alt={OBJECTS[cell].name} />
						</div>
					)),
				)}
			</div>
		</main>
	);
}
