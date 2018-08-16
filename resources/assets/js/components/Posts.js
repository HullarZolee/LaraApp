import React, { Component } from "react";
import ReactDOM from "react-dom";
import axios from "axios";

export default class Posts extends Component {
    // constructor(){
    //     super();
    //     this.state = {
    //         blogs: []
    //     }
    // }

    // componentWillUnmount(){
    //     axios.get('api/posts').then(response => {
    //         this.setState({
    //             blogs: response.data
    //         });
    //     }).catch(errors => {console.log(errors);
    // });
    //}

    constructor(props) {
        super(props);
        this.state = { blogs: [] };
    }
    componentDidMount() {
        axios
            .get("api/posts")
            .then(response => {
                this.setState({
                    blogs: response.data
                });
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    render() {

        let keys = [];
        
        keys.push(this.state.blogs.map(blog => (
           blog.id
        )));


        const listItems = this.state.blogs.map(blog => (
            <li key={blog.id}>{blog.body}</li>
        ));

        console.log(listItems);

        return (
            <div className="container">
                <h1>Helloo </h1>
               {listItems}
            </div>
        );
    }
}

if (document.getElementById("example")) {
    ReactDOM.render(<Posts />, document.getElementById("example"));
}
