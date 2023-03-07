import React, { useState } from 'react';
import ReactDOM from 'react-dom/client';
import {BrowserRouter as Router, Routes, Route} from 'react-router-dom'
import Login from '../Pages/Login';
import Menu from '../Pages/Menu';

export default function App() {
    

    return (
        // <Router>
        //     <Routes>
        //         <Route path='/login' element={<Login />}></Route>
        //     </Routes>
        // </Router>
        <><Login/></>
    )
}

if (document.getElementById('app')) {
    const Index = ReactDOM.createRoot(document.getElementById("app"));

    Index.render(
        <React.StrictMode>
            <App />
        </React.StrictMode>
    )
}
