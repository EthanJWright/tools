<?php
include("include/header.php");
?>

<h1>Vim Cheat Sheet</h1>
<p>Global</p>
<pre><code>:help keyword # open help for keyword
:o file       # open file
:saveas file  # save file as
:close        # close current pane</code></pre>

<p>Cursor Movement</p>
<pre><code>h        # move cursor left
j        # move cursor down
k        # move cursor up
l        # move cursor right
H        # move to top of screen
M        # move to middle of screen
L        # move to bottom of screen
w        # jump forwards to the start of a word
W        # jump forwards to the start of a word (words can contain punctuation)
e        # jump forwards to the end of a word
E        # jump forwards to the end of a word (words can contain punctuation)
b        # jump backwards to the start of a word
B        # jump backwards to the start of a word (words can contain punctuation)
0        # jump to the start of the line
^        # jump to the first non-blank character of the line
$        # jump to the end of the line
g_       # jump to the last non-blank character of the line
gg       # go to the first line of the document
G        # go to the last line of the document
5G       # go to line 5
fx       # jump to next occurrence of character x
tx       # jump to before next occurrence of character x
}        # jump to next paragraph (or function/block, when editing code)
{        # jump to previous paragraph (or function/block, when editing code)
zz       # center cursor on screen
Ctrl + b # move back one full screen
Ctrl + f # move forward one full screen
Ctrl + d # move forward 1/2 a screen
Ctrl + u # move back 1/2 a screen</code></pre>

<p>Insert Mode</p>
<pre><code>i        # insert before the cursor
I        # insert at the beginning of the line
a        # insert (append) after the cursor
A        # insert (append) at the end of the line
o        # append (open) a new line below the current line
O        # append (open) a new line above the current line
ea       # insert (append) at the end of the word
Esc      # exit insert mode</code></pre>

<p>Editing</p>
<pre><code>r        # replace a single character
J        # join line below to the current one
cc       # change (replace) entire line
cw       # change (replace) to the end of the word
c$       # change (replace) to the end of the line
s        # delete character and substitute text
S        # delete line and substitute text (same as cc)
xp       # transpose two letters (delete and paste)
.        # repeat last command
u        # undo
Ctrl + r # redo</code></pre>

<p>Marking Text</p>
<pre><code>v        # start visual mode, mark lines, then do a command (like y-yank)
V        # start linewise visual mode
o        # move to other end of marked area
O        # move to other corner of block
aw       # mark a word
ab       # a block with ()
aB       # a block with {}
ib       # inner block with ()
iB       # inner block with {}
Esc      # exit visual mode
Ctrl + v # start visual block mode</code></pre>

<p>Tabs</p>
<pre><code>:tabnew or :tabnew file # open a file in a new tab
Ctrl + wT               # move the current split window into its own tab
gt or :tabnext or :tabn # move to the next tab
gT or :tabprev or :tabp # move to the previous tab
<number>gt              # move to tab <number>
:tabmove <number>       # move current tab to the <number>th position (indexed from 0)
:tabclose or :tabc      # close the current tab and all its windows
:tabonly or :tabo       # close all tabs except for the current one
:tabdo command          # run the command on all tabs (e.g. :tabdo q - closes all opened tabs)</code></pre>

<h1>Tmux Cheat Sheet</h1>

<p>Sessions</p>
<pre><code>:new<CR>  new session
s  list sessions
$  name session</code></pre>

<p>Kill All Tmux Sessions</p>
<pre><code>tmux ls | grep : | cut -d. -f1 | awk '{print substr($1, 0, length($1)-1)}' | xargs kill</code></pre>

<p>Windows (tabs)</p>
<pre><code>c  create window
w  list windows
n  next window
p  previous window
f  find window
,  name window
&  kill window</code></pre>

<p>Panes (splits)</p>
<pre><code>%  vertical split
"  horizontal split

o  swap panes
q  show pane numbers
x  kill pane
+  break pane into window (e.g. to select text by mouse to copy)
-  restore pane from window
⍽  space - toggle between layouts
<prefix> q (Show pane numbers, when the numbers show up type the key to goto that pane)
<prefix> { (Move the current pane left)
<prefix> } (Move the current pane right)
<prefix> z toggle pane zoom</code></pre>

<?php
include("include/footer.php");
?>
