/**
 * Returns user data if logged in
 * 
 * @returns object|false
 */
var auth = {
    /**
     * Logout user
     * 
     * @param {string} redirect redirect to this url after logout
     * @returns 
     */
    logout: function (redirect) {
        // remove auth token and user data from local storage
        localStorage.removeItem('authToken');
        localStorage.removeItem('userData');
        if (redirect) {
            // redirect if specified
            window.location.href = redirect;
        }
        return true;
    },

    /**
     * Get user data from api
     * 
     * @param {string} token user auth token
     * 
     * @returns object|false
     */
    getUserData: async function (token) {
        let cachedData=localStorage.getItem('userData');
        // check for user data in local storage  
        if (cachedData) {
            return JSON.parse(cachedData);
        }
        // none found in local storage, fetch from api
        let userData= await fetch("/api/me",{ 
            method: "GET",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            }
        }).then(async function (response) {
            if (response.status !== 200) {
                return false;
            }
            let json= await response.json();
            return json;
        });
        if (userData) {
            // store user data in local storage
            localStorage.setItem('userData', JSON.stringify(userData));
        }
        return userData;
    },
    init: async function () {
        if (localStorage.getItem('authToken')) {
            // set token for later use 
            this.token=localStorage.getItem('authToken');
            // check for user data in local storage
            let userData=await this.getUserData(this.token);
            if (userData) {
                this.user=userData;
                return;
            }
        }
        this.user=false;
    }
}   
await auth.init();

export default auth;