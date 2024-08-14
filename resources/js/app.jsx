import "./bootstrap";
import "../css/app.css";
import 'bootstrap';

import ReactDOM from "react-dom/client";
import Home from "./Pages/Home";
import Layout from "./Pages/Guest/Layout";
import P404 from "./Pages/P404";
import Login from "./Pages/Guest/Login";
import Logout from "./Logout";
import { BrowserRouter, Routes, Route } from "react-router-dom";
         
export default function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Layout />}>
          <Route index element={<Home />} />
          <Route path="login" element={<Login />} />
          <Route path="logout" element={<Logout />} />
          <Route path="*" element={<P404 />} />
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

const root = ReactDOM.createRoot(document.getElementById('app'));
root.render(<App />);