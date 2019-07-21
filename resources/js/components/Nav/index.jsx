import React, { Component } from 'react';

export default class extends Component {
    render(){
        return(           
            <div className='sidenav'>
                <div className="sideLogo">
                    
                </div>
                <p class='user'>NISHAN KHANAL</p>
                Team Member

                <div className="sideLink_wrapper">
                    
                    <a href="/admin">DASHBOARD</a>
                    <a href="#">USERS</a>
                    <a href="/doctors">DOCTORS</a>
                    <a href="#">LABS</a>
                    <a href="#">CREATE NEW</a>

                </div>
            </div>       
        )
    }
}