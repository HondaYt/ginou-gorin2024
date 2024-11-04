import React from "react";
import ReactDOM from "react-dom/client";
import { createBrowserRouter, RouterProvider } from "react-router-dom";

import "./styles/index.css";

import Root from "./routers/root";
import Game from "./routers/game";
import Select from "./routers/select";
import Profile from "./routers/profile";
import Index from "./routers/index";
import Clear from "./routers/clear";

const router = createBrowserRouter([
	{
		path: "/",
		element: <Root />,
		children: [
			{
				index: true,
				element: <Index />,
			},
			{
				path: "/select",
				element: <Select />,
			},
			{
				path: "/game",
				element: <Game />,
			},
			{
				path: "/profile",
				element: <Profile />,
			},
			{
				path: "/clear",
				element: <Clear />,
			},
		],
	},
]);

ReactDOM.createRoot(document.getElementById("root")).render(
	<React.StrictMode>
		<RouterProvider router={router} />
	</React.StrictMode>,
);
