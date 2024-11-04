import { Outlet, useNavigate } from "react-router-dom";
import { useEffect } from "react";

export default function Root() {
	const navigate = useNavigate();

	useEffect(() => {
		const token = sessionStorage.getItem("token");
		const currentPath = window.location.pathname;

		if (!token) {
			if (currentPath !== "/") {
				navigate("/");
			}
		} else {
			if (currentPath === "/") {
				navigate("/select");
			}
		}
	}, [navigate]);

	return <Outlet />;
}
