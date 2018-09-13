import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter as Router, Link, Route} from 'react-router-dom';
import Posts from './components/Posts';
import Example from './components/Example';
import BlogPost from './components/BlogPost';
import ErrorBoundary from "./components/Error_boundaries";

export default class Index extends Component {
    render() {
        return (
            <div className="container">
            <Router>
            
                <div>
                <Link to="/">Home</Link>
                <Link to="/posts">Home</Link>
                

                <Route path="/" exact component={Example}/>
                <Route path="/posts" exact component={Posts}/>
                {/* <Route path="/posts/:id" 
                exact render={(props) => <BlogPost{...props} />} 
                /> */}

                {/* <Route path="/posts/:id"
                render={(props) => <BlogPost {...props} />} 
                /> */}

                <Route
                    path='/post/:id'
                    render={(props) => <BlogPost {...props} isAuthed={true} 
                />}
/>
                 
                
                </div>
                
                
            </Router>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Index />, document.getElementById('example'));
}
