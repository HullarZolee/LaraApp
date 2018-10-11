import React, { Component } from "react";
import ReactDOM from "react-dom";
import {BrowserRouter as Router, Link, Route} from 'react-router-dom';
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
            .get("/web/posts/")
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

        const listItems = this.state.blogs.map(blog => (
            <div className='card bg-dark mb-4'>
            <li className='card-body' key={blog.id}>
             <Link to={"/post/" + blog.id}> {blog.title} </Link>
             
            </li>
            <a className='btn bg-info text-white' href={"/posts/edit/" + blog.id}><h4>Edit</h4></a>
            <hr></hr>
            </div>
        ));

        //  console.log(listItems);

        return (
            <div className="container">
                

                
               {listItems}
            </div>
        );
    }
}

// if (document.getElementById("example")) {
//     ReactDOM.render(<Posts />, document.getElementById("example"));
// }
