import React, { Component } from 'react';
import {Link} from 'react-router-dom'
import getDoctor from '../func/getDoctorData'




export default class extends Component{
    constructor(){
        super()
        this.state={
            doctor:[]
        }
    }
    
    componentDidMount() {
        getDoctor().then(res=>{
            if(res){
                this.setState({
                    doctor:res
                })
            } else {
                console.log('CANT LOAD DATA')
            }
        })
    }

    render(){

        const data = this.state.doctor

        return(
            <div className='talex'>
                <table >
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    {data.map(row=>(
                        <tr key={row.id}>
                            <td>{row.login_details.name}</td>
                            <td>{row.department.department_name}</td>
                            <td><Link to={`/admin/doctor/${row.username}`}>View</Link></td>
                        </tr>
                    ))}
                </table>
            </div>
        )
    }
}