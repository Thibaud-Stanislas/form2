import React from "react";
import Header from "./Header"; // Importez le composant Header
import ContactForm from "./contactForm"; // Importez le composant ContactForm

function App() {
  return (
    <div className="height">
      {/* Utilisez le composant Header ici */}
      <Header />
      {/* Utilisez le composant ContactForm ici */}
      <ContactForm />
    </div>
  );
}
export default App; // Exportez le composant App par défaut
