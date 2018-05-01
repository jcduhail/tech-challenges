import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';

class App extends Component {

  constructor(props) {
    super(props);
    this.state = {
      type: '',
      code: ''
    };

    this.handleInputChange = this.handleInputChange.bind(this);
    this.callAPI = this.callAPI.bind(this);
  }

  handleInputChange(event) {
    const target = event.target;
    const value = target.value;
    const name = target.name;

    this.setState({
      [name]: value
    });
  }	

  callAPI(event){
    var code = this.state.code;
    fetch('http://localhost:8080/api/v1/surveys/'+this.state.type+'/'+code).then(function (response) {
      return response.json();
    }).then(function (result) {
      var html='';
      if(result.statusCode !== undefined || (result.length !== undefined && result.length === 0)){
        html = 'No Results';
      }else if(typeof result === 'object'){
        html = 'Products numbers for '+code+'<br/>'
        for (var property1 in result) {
          html = html + property1 + " : " + result[property1] + '<br/>';
        }
      }else{
        html='Average answers for '+code+' is '+result;
      }
      document.getElementById('content').innerHTML = html;
    });
  }	

  render() {
    return (
      <div className="App">
        <header className="App-header">
          <img src={logo} className="App-logo" alt="logo" />
          <h1 className="App-title">IWD senior fullstack challenge frontend part</h1>
        </header>
      <div className="Form">
        <form>
          <label htmlFor="type">Survey Type (qcm or numeric) : </label>
          <input type="text" id="type" name="type" onChange={this.handleInputChange} />&nbsp;
          <label htmlFor="code">Survey Code (XX1, XX2, XX3) : </label>
          <input type="text" id="code" name="code" onChange={this.handleInputChange} />&nbsp;
          <input type="button" value="Apply" onClick={this.callAPI} />
        </form>
      </div>
      <div id="content">
      </div>
      </div>
    );
  }
}

export default App;
