// --- Data Storage & Synchronization ---
const DEFAULT_DATA = {
    profile: {
        name: "Fathul Khair",
        title: "Full Stack Developer",
        intro: "Hello, I'm Khair.",
        lead: "Mahasiswa Teknik Informatika USU sekaligus Full-Stack Developer yang berfokus pada pembangunan solusi digital berdampak.",
        stats: { exp: "3+", projects: "10+", awards: "2+" }
    },
    skills: [
        { name: "HTML5 & CSS3", level: 95, color: "#38bdf8" },
        { name: "JavaScript (ES6+)", level: 60, color: "#818cf8" },
        { name: "Bootstrap & Tailwind", level: 80, color: "#8b5cf6" },
        { name: "Figma (UI Design)", level: 90, color: "#ef4444" }
    ],
    projects: [
        { id: 1, name: "Bot Asisten AI", tags: ["Python", "HTML", "JS"], desc: "Chatbot AI kontekstual yang mampu menjawab pertanyaan teknis & menghasilkan potongan kode.", img: "images/chatbot.png", url: "#" },
        { id: 2, name: "TalkLab Edukasi", tags: ["JS", "CSS", "HTML"], desc: "Platform edukasi online yang dirancang untuk membantu individu menguasai seni berbicara.", img: "images/takllab.png", url: "#" },
        { id: 3, name: "Booking Lapangan", tags: ["Flutter", "Dart", "Supabase"], desc: "Aplikasi mobile untuk memudahkan pengguna memesan lapangan futsal secara online.", img: "images/bookinglapangan.png", url: "#" },
        { id: 4, name: "SIAKAD Universitas", tags: ["PHP", "MySQL", "HTML"], desc: "Sistem informasi akademik untuk manajemen data mahasiswa, kurikulum, & nilai.", img: "images/siakad.png", url: "#" }
    ]
};

// Initialize or Load data
function loadPortfolioData() {
    const stored = localStorage.getItem('portfolio_data');
    if (!stored) {
        localStorage.setItem('portfolio_data', JSON.stringify(DEFAULT_DATA));
        return DEFAULT_DATA;
    }
    return JSON.parse(stored);
}

const currentData = loadPortfolioData();

// --- Dynamic Rendering ---
function renderDynamicContent() {
    // 1. Profile Content
    const nameEls = document.querySelectorAll('[data-bind="profile.name"]');
    const titleEls = document.querySelectorAll('[data-bind="profile.title"]');
    const introEl = document.querySelector('[data-bind="profile.intro"]');
    const leadEl = document.querySelector('[data-bind="profile.lead"]');
    
    if (nameEls) nameEls.forEach(el => el.textContent = currentData.profile.name);
    if (titleEls) titleEls.forEach(el => el.textContent = currentData.profile.title);
    if (introEl) introEl.textContent = currentData.profile.intro;
    if (leadEl) leadEl.textContent = currentData.profile.lead;

    // 2. Stats
    const expEl = document.querySelector('[data-bind="stats.exp"]');
    const projEl = document.querySelector('[data-bind="stats.projects"]');
    const awardEl = document.querySelector('[data-bind="stats.awards"]');
    if (expEl) expEl.textContent = currentData.profile.stats.exp;
    if (projEl) projEl.textContent = currentData.profile.stats.projects;
    if (awardEl) awardEl.textContent = currentData.profile.stats.awards;

    // 3. Skills (If on skill page)
    const skillsContainer = document.getElementById('dynamic-skills-list');
    if (skillsContainer) {
        skillsContainer.innerHTML = currentData.skills.map(s => `
            <div class="mb-4">
                <div class="d-flex justify-content-between mb-2">
                    <span class="fw-medium">${s.name}</span>
                    <span class="text-info">${s.level}%</span>
                </div>
                <div class="progress">
                    <div class="progress-bar" style="width: ${s.level}%; background: ${s.color};"></div>
                </div>
            </div>
        `).join('');
    }

    // 4. Projects (If on project page)
    const projectsContainer = document.getElementById('dynamic-projects-list');
    if (projectsContainer) {
        projectsContainer.innerHTML = currentData.projects.map(p => `
            <div class="col-md-6">
                <div class="glass-card p-0 overflow-hidden h-100 d-flex flex-column">
                    <div class="img-wrapper" style="height: 250px; overflow: hidden;">
                        <img src="${p.img}" class="w-100 h-100 object-fit-cover" alt="${p.name}">
                    </div>
                    <div class="p-4 flex-grow-1">
                        <h3>${p.name}</h3>
                        <div class="d-flex gap-2 my-3 flex-wrap">
                            ${p.tags.map(t => `<span class="badge">${t}</span>`).join('')}
                        </div>
                        <p class="small opacity-75">${p.desc}</p>
                    </div>
                    <div class="p-4 border-top" style="border-color: rgba(255,255,255,0.05) !important;">
                        <a href="${p.url}" target="_blank" class="btn btn-sm btn-outline-light rounded-pill px-3 me-2">Github</a>
                        <a href="#" class="btn btn-sm btn-neon">Demo</a>
                    </div>
                </div>
            </div>
        `).join('');
    }
}

// --- Navigation Active Link Handling ---
document.addEventListener('DOMContentLoaded', () => {
    renderDynamicContent();
    
    const currentPath = window.location.pathname.split("/").pop();
    const activePage = (currentPath === "" || currentPath === "index.html") ? "about.html" : currentPath;

    document.querySelectorAll('.nav-links a').forEach(link => {
        const href = link.getAttribute('href');
        if (href === activePage) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });

    // Mobile Menu Toggle
    const mobileBtn = document.querySelector('.mobile-menu-btn');
    const navLinks = document.querySelector('.nav-links');
    const menuIcon = mobileBtn ? mobileBtn.querySelector('i') : null;
    
    if (mobileBtn && navLinks && menuIcon) {
        mobileBtn.addEventListener('click', () => {
            const isOpen = navLinks.classList.toggle('active');
            mobileBtn.classList.toggle('active');
            
            // Toggle between Hamburger and Close icon
            if (isOpen) {
                menuIcon.classList.remove('fa-bars');
                menuIcon.classList.add('fa-xmark');
                document.body.style.overflow = 'hidden';
            } else {
                menuIcon.classList.remove('fa-xmark');
                menuIcon.classList.add('fa-bars');
                document.body.style.overflow = '';
            }
        });

        // Close menu when clicking a link
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileBtn.classList.remove('active');
                navLinks.classList.remove('active');
                menuIcon.classList.remove('fa-xmark');
                menuIcon.classList.add('fa-bars');
                document.body.style.overflow = '';
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!navLinks.contains(e.target) && !mobileBtn.contains(e.target) && navLinks.classList.contains('active')) {
                mobileBtn.classList.remove('active');
                navLinks.classList.remove('active');
                menuIcon.classList.remove('fa-xmark');
                menuIcon.classList.add('fa-bars');
                document.body.style.overflow = '';
            }
        });
    }

    // Chat Logic (Simplified and cleaned)
    const chatInput = document.getElementById('chat-input');
    const chatSend = document.getElementById('chat-send');
    const chatMessages = document.getElementById('chat-messages');

    if (chatInput && chatSend && chatMessages) {
        function addMessage(text, isUser = false) {
            const div = document.createElement('div');
            div.className = `d-flex mb-3 ${isUser ? 'justify-content-end' : ''}`;
            const content = document.createElement('div');
            content.className = isUser ? 'bg-primary text-black p-3 shadow-sm' : 'bg-secondary text-white p-3 shadow-sm';
            content.style.cssText = `max-width: 80%; border-radius: 12px; font-size: 0.9rem; ${isUser ? 'border-bottom-right-radius: 0;' : 'border-bottom-left-radius: 0;'}`;
            content.textContent = text;
            div.appendChild(content);
            chatMessages.appendChild(div);
            chatMessages.scrollTo({ top: chatMessages.scrollHeight, behavior: 'smooth' });
        }

        chatSend.addEventListener('click', () => {
            const text = chatInput.value.trim();
            if (text) {
                addMessage(text, true);
                chatInput.value = '';
                setTimeout(() => addMessage("Terima kasih telah bertanya! Saya adalah asissten virtual Fathul. Ada lagi yang bisa saya bantu?"), 1000);
            }
        });

        chatInput.addEventListener('keypress', (e) => { if (e.key === 'Enter') chatSend.click(); });
    }

    // Scroll Animation Observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: "0px 0px -50px 0px" });

    document.querySelectorAll('.glass-card, .gallery-item, .project-card, .stat-item, .btn-neon').forEach((el) => {
        el.classList.add('reveal');
        observer.observe(el);
    });
});
