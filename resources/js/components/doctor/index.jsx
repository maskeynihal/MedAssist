import React, { Component } from 'react';
import DoctorTable from './components/docTable'

export default class extends Component {
    render(){
        return(
            <div>
                <div class="main">
                    <h3 class="pageHeader">
                        DOCTORS
                    </h3>
                </div>
                <DoctorTable/>
            </div>
        )
    }
}