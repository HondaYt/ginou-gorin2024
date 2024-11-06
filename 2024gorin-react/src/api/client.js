// API のベース URL
// export const API_BASE_URL = "http://10.17.10.10:85"; //学校サーバー
// export const API_BASE_URL = "http://192.168.3.9:8085"; //自宅サーバーLocal
export const API_BASE_URL = "http://60.128.8.146:8085"; //自宅サーバーGlobal

// 認証付きのリクエストを行うヘルパー関数
const authFetch = async (endpoint, options = {}) => {
	const token = sessionStorage.getItem("token");
	const headers = {
		...options.headers,
		"Content-Type": "application/json",
		Authorization: `Bearer ${token}`,
	};

	const response = await fetch(`${API_BASE_URL}${endpoint}`, {
		...options,
		headers,
	});

	if (!response.ok) {
		const error = await response.json();
		throw new Error(error.message || `API error: ${response.status}`);
	}

	return response.json();
};

// API関数をエクスポート
export const api = {
	// 認証関連
	auth: {
		login: async (username, password) => {
			const response = await fetch(`${API_BASE_URL}/api/auth/login`, {
				method: "POST",
				headers: { "Content-Type": "application/json" },
				body: JSON.stringify({ username, password }),
			});
			return response.json();
		},
		logout: () => authFetch("/api/auth/logout", { method: "POST" }),
	},

	// ユーザー関連
	users: {
		getProfile: () => authFetch("/api/users/profile"),
		updateProfile: (data) =>
			authFetch("/api/users/profile", {
				method: "PUT",
				headers: { "Content-Type": "application/json" },
				body: JSON.stringify(data),
			}),
	},

	// ゲーム関連
	game: {
		getField: (level) => authFetch(`/api/fields?level=${level}`),
		getResults: (level) => authFetch(`/api/results?level=${level}`),
		submitResult: async (level, time) => {
			const response = await fetch(`${API_BASE_URL}/api/results`, {
				method: "POST",
				headers: {
					"Content-Type": "application/json",
					Authorization: `Bearer ${sessionStorage.getItem("token")}`,
				},
				body: JSON.stringify({ level, time }),
			});

			if (![200, 201].includes(response.status)) {
				const error = await response.json();
				throw new Error(error.message || `API error: ${response.status}`);
			}

			return response.json();
		},
	},
};
