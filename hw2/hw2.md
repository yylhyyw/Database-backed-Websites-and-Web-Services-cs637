---
export_on_save:
  html: true
---
# Yiwei Yao
# Assignment 2
---
## 1.
* a. Xs and Os are displayed by the image tag. For X: `<IMG SRC="x.gif" ALT="[X]" WIDTH=40 HEIGHT=42>` For O:`<IMG SRC="o.gif" ALT="[O]" WIDTH=40 HEIGHT=42>`
* b. the page send a post request when users click on a blank square. The post includes the parameter values of the blank square image that was clicked by the users. For example(user click on square 5 and at the location of (18,18)):
    ```
    ...
    ...
    5.x:18
    5.y:18
    ```
* c. two client-server rounds. one is a post request and one is a get request.
* d. browser is handling the cursor painting. There are there different cursor shapes I have found on this page. The different tags have its own style of cursor shapes. INPUT and A tags corresponding to a hand cursor, arrow cursor is corresponding to IMG tag, and text cursor is corresponding to text tag like H3, P and more.
* e. the current position in kept at the hidden type of input named board of the page. it stores the current position in a format like `<INPUT NAME=BOARD TYPE=HIDDEN VALUE=----X-O-- >`
* f. No, this HTML is not in HTML5 format. The “align” attribute on the “img” element is obsolete. the status of the address tag used near bottom is a child of element “b” because `<B>` is unclosed.
---
## 2.
There is my code:
```
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>User Registration</title>
    </head>
    <body>
        <h1>Register for This Website</h1>
        <form>
            <div>
                <label for="name" class="title">Name:</label>
                <input type="text" id="name" name="name" />
            </div>
            <div>
                <label for="email" class="title">Preferred Email:</label>
                <input type="email" id="email" name="email" />
            </div>
            <div class="submit">
                <input type="submit" value="Register" id="submit" />
            </div>
        </form>
    </body>
    </html>
```
* and it is how my page looks like:
![register_pic](register_pic.jpg)
I can slove the alignment problem by adding css to the label. more specificy I can add width property under the style of label tag so that all the text can have same width and they should be aligned.
---
## 3. 
* a. Yes, I am successed.
* b. Yes, I am successed.
---
## 4.
* a. it is my code:
    ```
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
    main {
        width: 600px;
        margin: 0 auto;
        padding: 2em;
        background: lightblue;
        border: 5px solid black;
    }
    h1 {
        margin-top: 0;
        color: red;
    }
    label {
        width: 10em;
        float: left;
        padding-right: 1em;
        padding-bottom: .5em;
        font-size: small;
        font-family: times;
    }
    #data input {
        float: left;
        width: 17em;
        margin-bottom: .5em;
    }
    #data span {
        padding-left: .25em;
        font-size: small;
    }
    #buttons input {
        float: left;
        margin-bottom: .5em;
    }
    br {
        clear: left;
    }
    ```
* b. I am using Safari 13.0.1 on a Mac. the page have a centered blue box with a thin border. In the box, it has white background and a title named "Product Discount Calculator" and three labels "Product Description", "List Price", and "Discount Percent" with their input text boxes on their left. what'more, at the row of "Discount Percent", there is a spaned '%' to the right of text input box. at the bottom, it has a submit named "Calculate Discount" centered.
---
## 5.
* a. it shows up approximately 10 stories on my computer and it uses at most 5 columns uses, and it shows 1 story on my smartphone and uses at most 1 columns.
* b. On my computer, I clicked on "world" at the most left of the navigation bar. On my smartphone, I clicked on "hamburger", and then clicked "world" under news section.
* c. 194 @media rules are in used. most of @media rules are testing the display with min-width is 740px. There are 246 `</a>` in used, 16 `<section>` in used, and 11 `<figure>` in used.
* d. The transition width is 1024px, below 1024px, nav disappears.