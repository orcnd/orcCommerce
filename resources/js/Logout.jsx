import React from "react";
import auth from "./auth";
const Logout = () => {
    auth.logout('/');
    return (
        <>
            Logout
        </>
    )
};

export default Logout;
          