import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Post from './components/Posts';

export default class Example extends Component {

    constructor(){
        super();
        console.log(super());
    }
    render() {
        return (
            <div className="container">
            <Post />
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
