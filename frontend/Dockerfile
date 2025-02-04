# Servidor de producción con SSR
FROM node:18.20.5

WORKDIR /app

# Copiar el build y package.json
COPY ./dist/gallegoDev /app/dist/gallegoDev
COPY ./package*.json ./

# Instalar dependencias de producción
RUN npm install --production

# Exponer el puerto para el servidor SSR
EXPOSE 4000

# Inicia el servidor SSR
CMD ["npm", "run", "serve:ssr"]
