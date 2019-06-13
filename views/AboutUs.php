<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>AcaTisM- Academic Thesis Manager</title>
    <link rel="stylesheet" href="css/scholarly.min.css">
    <script src="js/scholarly.min.js"></script>
  </head>
  <body prefix="schema: http://schema.org">
    <header>
      <div class="banner">
        <img src="scholarly-html.svg" width="227" height="50" alt="Scholarly HTML logo">
        <div class="status">Community Draft</div>
      </div>
      <h1>Academic Thesis Manager</h1>
    </header>
   
    <div role="contentinfo">
      <dl>
        <dt>Authors</dt>
        <dd>
          <p>Tinca Ketano-Leonard</p>
          &amp;
          <p>Mihai Elena-Sorina</p>
          &amp;
          <p>Birleanu Andrei-Cristian</p>
      </dl>
    </div>
    <section typeof="sa:Abstract" id="abstract" role="doc-abstract">
      <h2>Abstract</h2>
      <p>
      The AcaTisM Web application is an application that facilitates the management of master thesis and undergraduate theses in a faculty.
      The application will provide the following functionality: registration of two types of users - students and teachers -
      as well as their logging. For registration, students will need to provide data including: full name and full name,
      e-mail address, year of study, the average of the last year of study completed, or the average admission to college for students of the first year,
      as well as a link to the project repository on GitHub. Students will view, when they first enter the account,
      the list of available teachers will be able to view their profile, send a request for guidance or propose
      a project of a particular teacher, but also to search among the already existing themes.
         
      </p>
    </section>
    <section id="introduction" role="doc-introduction">
 
      <h2>Introduction</h2>
      <p>
        AcaTisM is a platform wich creates a better connection between professors and students in their bachlors or master's degree development.
      </p>

    <section id="structure">
      <!-- review? -->
      <h2>Overview</h2>
      <p>
        AcaTisM is built with modern Software Design techniques in mind and uses a 
        robust MVC architecture.
      </p>
      <section id="Technologies">
        
        <h3>The <code>Technologies</code> behind AcaTisM</h3>
        <p>
          The entire Web Application is powered by <b><code>PHP</code></b>
        </p>
        <p>
          <b><code>MySql</code></b> is used for persistent data storage by the Server for storing
          information about users and thesis.
        </p>
      
          
      </section>
      <section id="Architecture">
        <!-- review? -->
        <h3>The <code>Architecture</code></h3>
        <p>
          The <b><code>Model View Controller</code></b> architecture is used due to its
          familiarity and robustness. Below is a quick overview of the Project's architecture:
        </p>
        <ul>
          <li><b><code>The Model</code></b> is used for transmitting data between the 
          <code>Views</code> and their respective <code>Controllers</code>. <code>The Model</code>
          passes information such as User data, View properties such as the page title and metadata , package 
          information etc. and is one of the 3 key components of the <code>MVC</code> architecture.</li>
          <li><b><code>Views</code></b> are templates used for dynamic web content. They are rendered
          in the <code>Controllers</code> and represent what the Client sees upon accessing a 
          controlled resource.</li>
          <li><b><code>Controllers</code></b> represent the end-points of the Web Application - they 
          'serve' the <code>Views</code> to the Client through <code>HTTP</code>. A <code>Controller</code>
          usually receives an HTTP request, and typically returns an HTTP response. The response can be anything
          from plain text, to <code>Views</code>, to JSON's, to images etc. and represent the means of
          communication between the Client and the Server.</li>
          <li><b><code>Services</code></b> represent the <code>Business Logic</code> of the Web Application and
          serve as the link between the <code>Controller</code> layer and the <code>Repository</code> layer.</li>
          <li><b><code>The Repository Layer</code></b> is loosely coupled with the Database and is used to
          send information back and forth between the <code>Services</code> layer and the Database.</li>
        </ul>
        <p>
          The <code>MVC Architecture</code> is widely used today and has found its way outside the realm
          of Web programming as well.
        </p>
      </section>
      
      <section id="Security">
        <h3><code>Security</code></h3>
        <p>
          It is important for AcaTism to keep its users' information safe and for there to be no 
          potential security breaches. For these reasons, AcaTism takes <code>Security</code> very seriously.
        </p>
        <ul>
          <li>AcaTism is safe from any type of XSS attack.</li>
          <li>SQL Injections are also out of the question</li>
          <li>User passwords are hashed and salted and slow hashing functions are used.</li>
        </ul>
      </section>

     
      </section>
      <section id="hunk">
        <!-- review? -->
        <h3>Diagrams</h3>
        <p>
          Below are a few diagrams to illustrate the use cases of the Web Application as well
          as its architecture in more detail.
        </p>

        <section id="uml">
          <h3>UML Diagram</h3>
          <img style="width: 60%;" src="UMLDataBaseCore.png" alt="uml diagram"/>
        </section>
        
        <section id="usecase">
          <h3>Use Case Diagram for User</h3>
          <a href="img/usecase.png"><img style="width: 60%;" src="UseCase (2).png" alt="uml diagram"/></a>
        </section>
      </section>

        <section id="conclusion">
          <h3>Conclusion</h3>
          <section id="forfuture">
            <h3>Planned Features</h3>
            <p>
              The ability for students to propose themes.
            </p>
            <p>
              Automatic git integration.
            </p>
           
          </section>
        </section>
  </body>
</html>
