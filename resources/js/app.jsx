import "./bootstrap";
import "../css/app.css";
import 'bootstrap';

import ReactDOM from "react-dom/client";
import Home from "./Pages/Home";
import About from "./Pages/Guest/About";
import Layout from "./Pages/Guest/Layout";
import P404 from "./Pages/P404";

import { BrowserRouter, Routes, Route } from "react-router-dom";
         
export default function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Layout />}>
          <Route index element={<Home />} />
          <Route path="about" element={<About />} />
          <Route path="*" element={<P404 />} />
          {/* <Route path="blogs" element={<Blogs />} />
          <Route path="contact" element={<Contact />} />
          <Route path="*" element={<NoPage />} /> */}
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

const root = ReactDOM.createRoot(document.getElementById('app'));
root.render(<App />);