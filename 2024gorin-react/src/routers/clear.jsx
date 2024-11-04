import React, { useState, useEffect } from "react";
import styles from "../styles/clear.module.css";
import { useNavigate } from "react-router-dom";
import { api } from "../api/client";

export default function Clear() {
	const [rankings, setRankings] = useState([]);
	const [username, setUsername] = useState("");
	const navigate = useNavigate();

	useEffect(() => {
		const fetchData = async () => {
			try {
				// プロフィール情報の取得
				const profileData = await api.users.getProfile();
				setUsername(profileData.username);

				const results = await api.game.getResults(1);

				// 時間でソートし、同じ時間は同じ順位として上位3位を取得
				const sortedData = results
					.sort((a, b) => a.time - b.time)
					.reduce((acc, current) => {
						if (acc.length === 0) {
							current.rank = 1;
							acc.push(current);
							return acc;
						}

						const last = acc[acc.length - 1];
						if (last.time === current.time) {
							current.rank = last.rank;
						} else {
							current.rank = acc.length + 1;
						}

						if (current.rank <= 3) {
							acc.push(current);
						}
						return acc;
					}, []);

				setRankings(sortedData);
			} catch (error) {
				console.error("データ取得エラー:", error.message);
				alert("ランキングの取得に失敗しました。"); // エラーをユーザーに通知
			}
		};

		fetchData();
	}, []);

	const formatTime = (seconds) => {
		const minutes = Math.floor(seconds / 60);
		const remainingSeconds = seconds % 60;
		return `${minutes}:${remainingSeconds.toString().padStart(2, "0")}`;
	};

	return (
		<main>
			<h1>ランキング</h1>
			<div className={styles.rankings}>
				{rankings.map((rank, index) => (
					<div
						key={`${rank.username}-${rank.time}-${index}`}
						className={`${styles.rankItem} ${
							rank.username === username ? styles.active : ""
						}`}
					>
						<span className={styles.rank}>{rank.rank}位</span>
						<span className={styles.username}>{rank.username}</span>
						<span className={styles.time}>{formatTime(rank.time)}</span>
					</div>
				))}
			</div>
			<button
				type="button"
				className={styles.replayButton}
				onClick={() => navigate("/select")}
			>
				リプレイ
			</button>
		</main>
	);
}
