import React, { Component } from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import ErrorBoundary from "./Error_boundaries";

export default class BlogPost extends Component {
    constructor(props) {
        super(props);
        this.state = {
            post: {}
        };
    }

    componentDidMount() {
        axios
            .get("/api/posts")
            .then(response => { 
                this.setState({ post: response.data[0] });
                }).catch(error => console.log(error));
    }

    render() {

        return (
        <div>

            <h1>{this.state.post.title}</h1>
            <p> {this.state.post.body} </p>
        
        </div>
        );
    }
}