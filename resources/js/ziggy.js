const Ziggy = {
    url: "http://127.0.0.1:8000",
    port: 8000,
    defaults: {},
    routes: {
        "pages.index": { uri: "/", methods: ["GET", "HEAD"] },
        "pages.about": { uri: "about", methods: ["GET", "HEAD"] },
        "user.index": { uri: "user", methods: ["GET", "HEAD"] },
        "user.create": { uri: "user/create", methods: ["GET", "HEAD"] },
        "user.store": { uri: "user", methods: ["POST"] },
        "user.show": {
            uri: "user/{user}",
            methods: ["GET", "HEAD"],
            parameters: ["user"],
        },
        "user.edit": {
            uri: "user/{user}/edit",
            methods: ["GET", "HEAD"],
            parameters: ["user"],
        },
        "user.update": {
            uri: "user/{user}",
            methods: ["PUT", "PATCH"],
            parameters: ["user"],
        },
        "user.destroy": {
            uri: "user/{user}",
            methods: ["DELETE"],
            parameters: ["user"],
        },
        login: { uri: "login", methods: ["GET", "HEAD"] },
    },
};
if (typeof window !== "undefined" && typeof window.Ziggy !== "undefined") {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
