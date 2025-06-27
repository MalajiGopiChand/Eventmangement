import { defineConfig } from 'vite';
import { createServer } from 'node:http';
import { execSync } from 'node:child_process';
import { resolve } from 'node:path';

export default defineConfig({
  server: {
    middleware: [
      (req, res, next) => {
        if (req.url.endsWith('.php')) {
          // Execute PHP file
          const phpFilePath = resolve(__dirname, req.url.slice(1));
          try {
            const output = execSync(`php ${phpFilePath}`).toString();
            res.setHeader('Content-Type', 'text/html');
            res.end(output);
          } catch (error) {
            res.statusCode = 500;
            res.end(`Error executing PHP: ${error.message}`);
          }
        } else {
          next();
        }
      }
    ]
  }
});