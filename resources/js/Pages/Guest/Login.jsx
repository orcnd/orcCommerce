import React from "react";
import { useForm } from "react-hook-form"

const Login = () => {
    const { register, handleSubmit, setError, formState: { errors }, clearErrors } = useForm()
    const onSubmit = async function (data) {
        console.log("data",data);
        try {
            await fetch(
                '/api/login',
                {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                }
            ).then(async function (response) {
                let js=await response.json();
                // something went wrong
                if (response.status !== 200) {
                    setValidateError(js);
                }else{
                    setAuthToken(js);
                }
            });
        } catch (errors) {
            console.error(errors);   
        }

    }

    const setAuthToken = function (token) {
        localStorage.setItem('authToken', token);
        window.location.href = "/";
    }
    const setValidateError = function (errors) {
        setError("form", errors);
        console.log("errors",errors);
    }

    return (
        <>
            <div className="container">
                <h1>Login</h1>
                <form   onSubmit={e => {
                    clearErrors()
                    handleSubmit(onSubmit)(e)
                }}>
                    {errors.form && !errors.form.hasOwnProperty('errors') && <div className="alert alert-danger">{errors.form.message}</div>}  
                    <input type="email" {...register("email", {required: true, maxLength: 255})} placeholder="Email" className="form-control" />
                    <br />
                    {errors.form && errors.form.errors && errors.form.errors.password && <div className="alert alert-danger">{errors.form.errors.password[0]}</div>}
                    <input type="password" {...register("password", {required: true, maxLength: 255})} placeholder="Password" className="form-control" />
                    <br />
                    <button type="submit" className="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </>
    )
};

export default Login;
          