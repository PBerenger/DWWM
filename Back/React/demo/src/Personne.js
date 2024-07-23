import React from 'react';

function Personne(props) {
     const date = new Date()
    return (
        <>
            <h1>{props.nom}</h1>
            <div>{props.age}</div>
            <div>{props.sexe}</div>

            <p>{date.getFullYear()-props.age}</p>
        </>
    );
}

export default Personne;