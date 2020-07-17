import React from 'react';
import './App.css';
import Videocall from './VideocallComponent';

const VideoComponent = () => {
  return (
    <div className="app">
      <header>
        <h1>Video Chat with Hooks</h1>
      </header>
      <main>
        <Videocall />
      </main>
      <footer>
        <p>
          Made with{' '}
          <span role="img" aria-label="React">
            ⚛️
          </span>{' '}
          by <a href="https://twitter.com/philnash">philnash</a>
        </p>
      </footer>
    </div>
  );
};

export default VideoComponent;
