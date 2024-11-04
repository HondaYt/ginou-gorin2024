import { useState, useEffect } from "react";
import { Link, useNavigate } from "react-router-dom";
import { api } from "../api/client";

export default function Select() {
	const [nickname, setNickname] = useState("");
	const [totalPlayTime, setTotalPlayTime] = useState(0);
	const navigate = useNavigate();

	useEffect(() => {
		const fetchProfile = async () => {
			try {
				const data = await api.users.getProfile();
				setNickname(data.nickname);

				const totalSeconds = data.results.reduce(
					(sum, result) => sum + result.time,
					0,
				);
				const totalMinutes = Math.ceil(totalSeconds / 60);
				setTotalPlayTime(totalMinutes);
			} catch (error) {
				console.error("プロフィール取得エラー:", error);
			}
		};

		fetchProfile();
	}, []);

	const handleLogout = async () => {
		try {
			await api.auth.logout();
			sessionStorage.removeItem("token");
			navigate("/");
		} catch (error) {
			console.error("ログアウトエラー:", error);
		}
	};

	return (
		<main>
			<h1>Welcome,{nickname}</h1>
			<p>Your total play time is {totalPlayTime}min</p>
			<Link to="/profile">Profile Settings</Link>
			<button type="button" onClick={handleLogout}>
				Logout
			</button>
			<Link to="/game?level=1">Easy</Link>
			<Link to="/game?level=2">Normal</Link>
		</main>
	);
}
