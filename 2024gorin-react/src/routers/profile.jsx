import { useState, useEffect, useCallback } from "react";
import { useNavigate } from "react-router-dom";
import { api } from "../api/client";

export default function Profile() {
	const [username, setUsername] = useState("");
	const [nickname, setNickname] = useState("");
	const [isValid, setIsValid] = useState(false);
	const navigate = useNavigate();

	// プロフィール情報を取得
	useEffect(() => {
		const fetchProfile = async () => {
			try {
				const data = await api.users.getProfile();
				setUsername(data.username);
				setNickname(data.nickname);
			} catch (error) {
				console.error("プロフィール取得エラー:", error);
			}
		};

		fetchProfile();
	}, []);

	// バリデーション用の関数をuseCallbackで最適化
	const validateInputs = useCallback(() => {
		const usernameRegex = /^[a-zA-Z0-9]+$/;
		const isUsernameValid =
			username.length >= 5 && usernameRegex.test(username);
		const isNicknameValid = nickname.length >= 4;
		setIsValid(isUsernameValid && isNicknameValid);
	}, [username, nickname]);

	// 入力値が変更されるたびにバリデーションを実行
	useEffect(() => {
		validateInputs();
	}, [validateInputs]);

	// プロフィール更新処理を追加
	const handleSubmit = async (e) => {
		e.preventDefault();
		try {
			await api.users.updateProfile({ username, nickname });
			navigate("/select");
		} catch (error) {
			console.error("プロフィール更新エラー:", error);
			alert("エラーが発生しました");
		}
	};

	return (
		<main>
			<h1>プロフィール設定</h1>
			<form onSubmit={handleSubmit}>
				<div>
					<label htmlFor="username">ユーザーネーム</label>
					<input
						type="text"
						id="username"
						value={username}
						onChange={(e) => setUsername(e.target.value)}
						required
						minLength={5}
						pattern="[a-zA-Z0-9]+"
					/>
				</div>
				<div>
					<label htmlFor="nickname">ニックネーム</label>
					<input
						type="text"
						id="nickname"
						value={nickname}
						onChange={(e) => setNickname(e.target.value)}
						required
						minLength={4}
					/>
				</div>
				<button type="submit" disabled={!isValid}>
					更新
				</button>
			</form>
		</main>
	);
}
