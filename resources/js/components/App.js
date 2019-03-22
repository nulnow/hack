import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class App extends Component {
    constructor(props) {
        super(props);

        this.state = {
            counter: 0,
            text: ''
        };
    }

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Counter</div>

                            <div className="card-body">
                                Text: {this.state.text} <br />
                                Count: {this.state.counter} <br /> <br />
                                <input
                                    type=""
                                    name=""
                                    value={this.state.text}
                                    onChange={event => {
                                        this.setState({
                                            text: event.target.value
                                        })
                                    }}
                                />
                                <button
                                    className="btn btn-primary"
                                    onClick={event => {
                                        this.setState(state => {
                                            return {
                                                counter: state.counter + 1
                                            }
                                        });
                                    }}    
                                >Increment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<App />, document.getElementById('example'));
}
