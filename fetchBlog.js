// fetchBlog.js
const fs = require('fs');
const https = require('https');
const cron = require('node-cron');

function fetchBlog(username = 'tejas303525', outputFile = 'blog.json') {
    return new Promise((resolve, reject) => {
        if (!username) return reject(new Error('Username is required!'));

        const url = `https://medium.com/feed/@${username}`;
        const options = {
            host: "api.rss2json.com",
            path: `/v1/api.json?rss_url=${encodeURIComponent(url)}`,
            method: "GET",
            headers: {
                "Content-Type": "application/json"
            },
            timeout: 5000
        };

        const req = https.request(options, (res) => {
            let mediumData = "";

            if (res.statusCode !== 200) {
                return reject(new Error(`Received status code ${res.statusCode}`));
            }

            res.on("data", chunk => mediumData += chunk);
            res.on("end", () => {
                try {
                    const rawData = JSON.parse(mediumData);

                    if (rawData.status !== "ok") {
                        throw new Error(rawData.message || "Invalid response from API");
                    }

                    const formattedPosts = rawData.items.map(post => ({
                        title: post.title,
                        category: post.categories[0] || "General",
                        author: post.author,
                        date: new Date(post.pubDate).toLocaleDateString('en-US', { 
                            year: 'numeric', 
                            month: 'short', 
                            day: 'numeric' 
                        }),
                        excerpt: post.description.replace(/<[^>]+>/g, '').substring(0, 200) + '...',
                        link: post.link
                    }));

                    fs.writeFile(outputFile, JSON.stringify(formattedPosts, null, 2), (err) => {
                        if (err) return reject(err);
                        console.log(`✅ Blog updated: ${formattedPosts.length} posts saved to ${outputFile}`);
                        resolve(formattedPosts);
                    });
                } catch (error) {
                    reject(error);
                }
            });
        });

        req.on("error", reject);
        req.end();
    });
}

module.exports = fetchBlog;
