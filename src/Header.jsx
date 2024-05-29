
import React from 'react';
import logo from './Logo.png'; // Import de l'image


const Header = () => {
  return (
    <header>
      <div className="logo">
        <img src={logo} alt="Logo" />
      </div>
      <div className="title">
        <h1>formulaire</h1>
      </div>
    </header>
  );
};

export default Header;