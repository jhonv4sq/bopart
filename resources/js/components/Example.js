import React from 'react';
import { createRoot } from "react-dom/client";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faEye } from '@fortawesome/free-solid-svg-icons'

function Example() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>
                        <div className="card-body text-3xl font-bold underline">I'm an example component!</div>                      
                        <FontAwesomeIcon icon={faEye} />
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    const root = createRoot(document.getElementById("example"));
    root.render(<Example />);
}
