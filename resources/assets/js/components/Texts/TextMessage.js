import React, { Component, Fragment } from 'react';
import './TextMessage.css';

export default class TextMessage extends Component {
  constructor(props) {
    super(props);
    this.state = {
        orgId:'',
        to :'',
        message:'',
        errors: {}
    }

    this.handleSubmit = this.handleSubmit.bind(this)
  }

  handleSubmit(event) {
    event.preventDefault();

      if(this.handleValidation()){
      var orgId =this.state.orgId;
      var to =  this.state.to;
      var message = this.state.message;
      var url = 'https://api.engagespark.com/v1/sms/contact';

      var data = {orgId: orgId, to:to,message:message};

      fetch(url, {
        method: 'POST',
        body: JSON.stringify(data),
        headers:{
          'Access-Control-Allow-Origin': '*',
          'Access-Control-Allow-Methods': 'GET, POST, OPTIONS',
          'Connection': 'keep-alive',
          'Access-Control-Allow-Headers': 'Origin, X-Requested-With, Content-Type, Accept',
          'Content-Type': 'application/json',
          'Authorization': 'Token 7999eb1e73970d77f1a5927bcd89737ae08ba52b'
          // 'Accept': 'application/json'
         // 'Content-Type': 'multipart/form-data',
        }
      })
      .then(res => res.json())
      .then(response => {
        debugger
          alert("Successfully Send");
          this.props.history.push(`/`);
      })
      .catch(error => alert('Error:' +  error));

    }
  }

  handleValidation(){
    let fields = this.state;
    let errors = {};
    let formIsValid = true;
    if(!fields["orgId"]){
        formIsValid = false;
        errors["orgId"] = "Cannot be empty";
     }
     if(fields["to"]){
        if(!fields["to"]){
           formIsValid = false;
           errors["to"] = "Cannot be empty";
        }
     }
     if(!fields["message"]){
         formIsValid = false;
         errors["message"] = "Cannot be empty";
     }

     this.setState({errors: errors});
     return formIsValid;
  }


  render() {
    return (
      <Fragment>
      <form onSubmit={this.handleSubmit.bind(this)} method="POST">

      <div class="form-group">
 		    <label>Org ID</label>
 		    <input type="text" name="orgId" className="form-control"/>
 		  </div>

      <div class="form-group">
 		    <label>To</label>
 		    <input type="number" name="to" className="form-control" placeholder="639457863487"/>
 		  </div>

      <div class="form-group">
 		    <label>Message</label>
        <textarea name="message" className="form-control" placeholder="Type message.."></textarea>
 		  </div>

        <button type="submit" className="btn">
          Send message
        </button>
      </form>
        </Fragment>
    );
  }
}
