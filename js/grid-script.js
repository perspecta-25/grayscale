let json = [
    {
        name: "QuickCart",
        desc: "A minimalist e-commerce web app prototype focused on one-click checkout and mobile-first design.",
        imgPath: "placeholder.png"
    },
    {
        name: "Wanderly",
        desc: "A travel planning tool that allows users to build and share custom itineraries with map integration and real-time weather.",
        imgPath: "placeholder.png"
    },
    {
        name: "MindNest",
        desc: "A clean, distraction-free note-taking app with AI-assisted tagging and smart organization features.",
        imgPath: "placeholder.png"
    },
    {
        name: "FitSync",
        desc: "A fitness tracker dashboard that syncs wearable data and displays intuitive weekly performance charts.",
        imgPath: "placeholder.png"
    },
    {
        name: "CasaMatch",
        desc: "A real estate app prototype using swipe-based UI to match users with homes based on lifestyle preferences.",
        imgPath: "placeholder.png"
    },
    {
        name: "StudyBuddy",
        desc: "A collaborative learning platform where students can form study groups, schedule sessions, and share resources.",
        imgPath: "placeholder.png"
    },
    {
        name: "MoodBoarder",
        desc: "A drag-and-drop mood board creator for designers and creatives, with export and style guide generation tools.",
        imgPath: "placeholder.png"
    },
    {
        name: "Eventure",
        desc: "A sleek event management tool for small organizers to create, promote, and track RSVPs for local events.",
        imgPath: "placeholder.png"
    },
];


$(document).ready(function () {
    json.forEach(function (project) {
        $(".projects-grid").append(
            `
      <div class =  "project">
      <p>
        ${project.name}
      </p>
      <p>
        ${project.desc}
      </p>
      <img src = "assets/img/${project.imgPath}">
    </div>
      `
        )
    })
})
