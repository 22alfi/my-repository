# Use Node.js base image
FROM node:18-alpine

# Set working directory
WORKDIR /app

# Copy package.json and install dependencies
COPY package.json .
RUN npm install --production

# Copy app file
COPY App.js .

# Expose port
EXPOSE 3000

# Start app
CMD ["npm", "start"]
