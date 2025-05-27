<?php 
$title = "Fermeri i Mençur - Kryefaqja";
include '../includes/header.php';
include '../includes/config.php';

?>
<style>
body {
    background: linear-gradient(135deg, #e0ffe0 0%, #b2f7b2 100%);
    font-family: 'Segoe UI', Arial, sans-serif;
    color: #2d4a22;
    margin: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

main {
    flex: 1 0 auto;
}

main section {
    background: rgba(255,255,255,0.85);
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(60,120,60,0.08);
    padding: 2rem;
    margin: 2rem auto;
    max-width: 600px;
    border: 2px solid #a3d977;
    position: relative;
    overflow: hidden;
    animation: fadeInUp 1.2s cubic-bezier(.39,.575,.565,1.000);
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(40px);}
    to { opacity: 1; transform: translateY(0);}
}

main section:before {
    content: "";
    background: url('https://cdn.pixabay.com/photo/2017/01/20/00/30/field-1996921_1280.png') no-repeat bottom right;
    background-size: 180px;
    opacity: 0.15;
    position: absolute;
    bottom: 0; right: 0; top: 0; left: 0;
    pointer-events: none;
}

h1 {
    color: #4e8c2b;
    font-family: 'Georgia', serif;
    text-shadow: 1px 2px 0 #d0f5b1;
    animation: colorPulse 2s infinite alternate;
}

@keyframes colorPulse {
    from { color: #4e8c2b;}
    to { color: #7ed957;}
}

ul {
    list-style: none;
    padding: 0;
}
ul li {
    padding-left: 1.5em;
    margin-bottom: 0.5em;
    position: relative;
    opacity: 0;
    animation: listFadeIn 0.8s forwards;
}
ul li:nth-child(1) { animation-delay: 0.3s;}
ul li:nth-child(2) { animation-delay: 0.6s;}
ul li:nth-child(3) { animation-delay: 0.9s;}

@keyframes listFadeIn {
    to { opacity: 1; }
}

ul li:before {
    content: "🌱";
    position: absolute;
    left: 0;
    top: 0;
    font-size: 1.2em;
    animation: grow 1.5s infinite alternate;
}
@keyframes grow {
    from { transform: scale(1);}
    to { transform: scale(1.15);}
}

/* Footer qendror */
footer {
    flex-shrink: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 1.2rem 0;
    background: transparent;
}
</style>
<link rel="stylesheet" href="../css/style.css">


<main>
    <section>
        <h1>Mirësevini në Fermeri i Mençur</h1>
        <p>Kjo platformë ju ndihmon të menaxhoni fermën tuaj në mënyrë të zgjuar dhe efikase.</p>
        <ul>
            <li>Monitoroni të dhënat e fermës në kohë reale</li>
            <li>Merrni këshilla për përmirësimin e prodhimit</li>
            <li>Analizoni statistikat dhe raportet</li>
        </ul>
    </section>
</main>

<?php include 'footer.php'; ?>