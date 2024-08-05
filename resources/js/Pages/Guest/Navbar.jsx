import { Outlet, Link } from "react-router-dom";

const Navbar = () => {
    return (
        <>        
         <nav class="navbar navbar-expand-lg bg-body-tertiary">
             <div className="container-fluid">
                 <a href="#" className="navbar-brand">orcCommerce</a>
                <button class="navbar-toggler" 
                    type="button" data-bs-toggle="collapse" 
                    data-bs-target="#main-navbar" aria-controls="main-navbar" 
                    aria-expanded="false" aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                 <div className="collapse navbar-collapse" id="main-navbar">
                     <ul className="navbar-nav me-auto mb-2 mb-lg-0">
                         <li className="nav-item">
                             <Link to="/" className="nav-link">Home</Link>
                         </li>
                     </ul>
                 </div>

             </div>
         </nav>
        </>
    )
};

export default Navbar;
          