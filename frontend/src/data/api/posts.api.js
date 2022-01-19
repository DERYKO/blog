import client from "./client";

export default {
    async getFeed(filters) {
        return client.parseResponse(await client.get('/feed', filters));
    },
    async createPost(payload) {
        return client.parseResponse(await client.post('/post', payload));
    },
    async getUserPosts(filters) {
        return client.parseResponse(await client.get('/post', filters));
    },
    async getPost(id) {
        return client.parseResponse(await client.get('/feed/' + id));
    }
}
