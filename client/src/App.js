import './App.css';
import React from 'react';
import axios from 'axios';
import Upload from './Components/Upload';

export default class App extends React.Component
{
  constructor(props){
    super(props);
    this.exportEmploye = this.exportEmploye.bind(this);
  }

  render() {
    return (
      <div className="App">
      <header className="App-header">
        <button onClick={this.exportEmploye}>Exportar empleados</button>
        <Upload />
      </header>
    </div>
    )
  };
  exportEmploye(params) {
    axios({
      url: 'http://localhost:8080/api/export',
      responseType: 'blob',
      method : 'GET'
    })
    .then(response => {
      console.log('response')
      const url = window.URL.createObjectURL(new Blob([response.data]));
      const link = document.createElement('a');
      link.href = url;
      link.setAttribute('download',  'export.csv');
      document.body.appendChild(link);
      link.click();
    })
    .catch(error => {
      console.log(error);

    })
  };
}

