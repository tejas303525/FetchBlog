const express = require('express');
const path = require('path');
const fs = require('fs');
const https = require('https');
const { exec } = require('child_process');
const fetchBlog = require('./fetchBlog');
const cron = require('node-cron');
const app = express();
const PORT = process.env.PORT || 5500;
const cors = require('cors');


app.use(cors());
fetchBlog().catch(console.error)

cron.schedule('*/30 * * * *', () => {
    console.log('⏰ Running scheduled blog fetch...');
    fetchBlog().catch(err => console.error('Error updating blog:', err));
});

// Serve the blog.json to frontend
app.get('/blog-data', (req, res) => {
    const filePath = path.join(__dirname, 'blog.json');
    res.sendFile(filePath);
});
app.get('/blog.html', (req, res) => {
    res.sendFile(path.join(__dirname, 'blog.html'));
});  

app.get('/',(req,res)=>{
    res.sendFile(path.join(__dirname,'index.html'));
})
app.get('/index.html',(req,res)=>{
    res.sendFile(path.join(__dirname,'index.html'));
})


app.get('/about.html',(req,res)=>{
    res.sendFile(path.join(__dirname,'about.html'));
})
app.get('/projects.html',(req,res)=>{   
    res.sendFile(path.join(__dirname,'projects.html'));
}
)
app.get('/contact.html',(req,res)=>{
    res.sendFile(path.join(__dirname,'contact.html'));
}
)

app.get("/service.html",(req,res)=>{
    res.sendFile(path.join(__dirname,'service.html'));
})

// app.get("/feature.html",(req,res)=>{
//     res.sendFile(path.join(__dirname,'feature.html'));
// })


app.get('/feature.html',(req,res)=>{
    res.sendFile(path.join(__dirname,'feature.html'));
})

app.get("/team.html",(req,res)=>{
    res.sendFile(path.join(__dirname,'team.html'));
})

app.get("/testimonial.html",(req,res)=>{
    res.sendFile(path.join(__dirname,'testimonial.html'));
})

app.get("/FAQ.html",(req,res)=>{
    res.sendFile(path.join(__dirname,'FAQ.html'));
})




// Serve static files from the css directory
// Serve static files from the js directory
app.use('/lib', express.static(path.join(__dirname, 'lib')));
app.use('/js', express.static(path.join(__dirname, 'js')));
app.use('/css', express.static(path.join(__dirname, 'css')));
app.use('/img',express.static(path.join(__dirname,'img')))
app.use((req,res)=>{
    res.status(404).sendFile(path.join(__dirname,'404.html'));
})
app.listen(PORT, () => {
    console.log(`Server running on http://localhost:${PORT}`);
});
