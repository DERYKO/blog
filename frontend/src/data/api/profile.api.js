import client from "./client";
export default {
    async login(credentials) {
        return client.parseResponse(await client.post('/login', credentials))
    },
    async getProfile(filters) {
        return client.parseResponse(await client.get('/profile', filters))
    },
    async logout(filters) {
        return client.parseResponse(await client.post('/logout', filters))
    },
    async register(payload){
        return client.parseResponse(await client.post('/register', payload))
    }
}
