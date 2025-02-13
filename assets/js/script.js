document.addEventListener('DOMContentLoaded', function() {
    // Alert method for Final Test sub-section
    function isValid() {
        let password = document.getElementById("password").value;
        if (password === "jellybean") {
            window.location.href = "congrats-2.html";
        } else {
            alert("Oops! Goodbye, friend.");
        }
    }

    // Ensure dark mode is enabled on page load
    document.body.classList.add("dark-mode");

    // Image and caption data
    const images = [
        {
            src: "https://www.securityweek.com/wp-content/uploads/2024/12/Cybersecurity-Marketing-1024x576.jpg",
            caption: "Top Cybersecurity Trends in 2024 - Tap to Learn More"
        },
       
        {
            src: "https://cdn.prod.website-files.com/640f78d90b310438f1fab4be/643420852af2783deed5805e_ThreatLocker_EndpointSecuityExplained_BlogHeader-03-png.webp",
            caption: "Latest Updates from Security Week - Tap to Learn More"
        }
    ];

    let currentIndex = 0;
    const newsImage = document.getElementById('news-image');
    const newsCaption = document.getElementById('news-caption');

    function updateImageAndCaption() {
        const currentImage = images[currentIndex];
        newsImage.src = currentImage.src;
        newsCaption.textContent = currentImage.caption;
        currentIndex = (currentIndex + 1) % images.length;
    }

    // Initial update
    updateImageAndCaption();

    // Change image and caption every 2 seconds
    setInterval(updateImageAndCaption, 2000);

    // Add click event to direct to Security Week site
    const newsLink = document.getElementById('news-link');
    newsLink.href = "https://www.securityweek.com/news/";

    // Add event listener to the submit button
    document.getElementById('sendTest').addEventListener('click', isValid);
});
