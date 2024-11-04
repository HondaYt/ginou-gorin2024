import { useState } from "react";
import { useNavigate } from "react-router-dom";
import { api } from "../api/client";

export default function Index() {
	const [username, setUsername] = useState("");
	const [password, setPassword] = useState("");
	const navigate = useNavigate();

	const handleLogin = async (e) => {
		e.preventDefault();
		try {
			const data = await api.auth.login(username, password);
			sessionStorage.setItem("token", data.token);
			navigate("/select");
		} catch (error) {
			alert("Login failed.");
		}
	};

	return (
		<main>
			<form onSubmit={handleLogin}>
				<input
					type="text"
					value={username}
					onChange={(e) => setUsername(e.target.value)}
					placeholder="ユーザー名"
				/>
				<input
					type="password"
					value={password}
					onChange={(e) => setPassword(e.target.value)}
					placeholder="パスワード"
				/>
				<button type="submit">ログイン</button>
			</form>
		</main>
	);
}
