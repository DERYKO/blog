import profile from "./profile.api"
import posts from "./posts.api";
export default {
    ...profile,
    ...posts
};
