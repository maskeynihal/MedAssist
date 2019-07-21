import React, { Component,Fragment } from 'react';

export default class extends Component{
    render(){
        return(
            <Fragment>
                <div class="main">
                    <h3 class="pageHeader">
                        SCHDEDULING
                    </h3>
                </div>
                <div className="Card">
                <div class="card">
	                <div class="card-header">Doctor Schedule</div>
	                <div class="card-body">
		                <form>
		                  <div class="form-group row">
		                    <label class="col-sm-2 col-form-label">Name</label>
		                    <div class="col-sm-10">
		                      <input type="text" class="form-control" placeholder="Email"/>
		                    </div>
		                  </div>
		                  <div class="form-group row">
		                    <label class="col-sm-2 col-form-label">Day</label>
		                    <div class="col-sm-10">
		                      <select class="custom-select custom-select-md mb-1">
		                        <option selected >Choose a day</option>
		                        <option value="1">Sunday</option>
		                        <option value="2">Monday</option>
		                        <option value="3">Tuesday</option>
		                        <option value="3">Wednesday</option>
		                        <option value="3">Thursday</option>
		                        <option value="3">Friday</option>
		                        <option value="3">Saturday</option>
		                      </select>
		                    </div>
		                  </div>
		                  <div class="form-group row">
		                    <div class="col-lg-6">
		                      <label class="col-form-label">Starting Time</label>
		                      <input type="time" class="form-control"/>
		                  	</div>
		                    <div class="col-lg-6">
		                    	<label class="col-form-label">End Time</label>
		                      	<input type="time" class="form-control"/>
		                    </div>
		                  </div>
		                </form>
	            	</div>
	            </div>
                </div>
            </Fragment>
        )
    }
}