import React, { Component,Fragment } from 'react';

export default class extends Component{
    render(){
        return(
            <Fragment>
                <div class="main">
                    <h3 class="pageHeader">
                        DASHBOARD
                    </h3>
                </div>
                <div class="dashContent">
                        <div class="row">
                                <div class="col-sm dashbox">
                                    <a href="./newDoctor.htm"><i class="fas fa-user-md"></i><br/>Add Doctor</a>
                                </div>
                                <div class="col-sm dashbox">
                                    <a href="./newDoctor.htm"><i class="fas fa-procedures"></i><br/>Add Patient</a>
                                </div>
                                <div class="col-sm dashbox"></div>
                                <div class="col-sm dashbox"></div>
                                <div class="col-sm dashbox"></div>
                        </div>
                        <div class="row"></div>
                </div>   
            </Fragment>
                
        )
    }
}