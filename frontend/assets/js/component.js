"use strict";
!(function () {
  function i(e, l) {
    return new ClipboardJS(e, {
      text: function () {
        return l;
      },
    });
  }
  Array.prototype.slice
    .call(document.querySelectorAll(".pc-component"))
    .forEach(function (e) {
      document.createElement("div").className = "pc-btns";
      var s,
        l = document.createElement("a"),
        c =
          ((l.href = "javascript:void(0)"),
          (l.className = "md-pc-modal-copy copy"),
          (l.innerHTML = '<i class="ph-duotone ph-copy"></i>'),
          document.createElement("a")),
        a =
          ((c.href = "javascript:void(0)"),
          (c.className = "pc-collapse"),
          (c.innerHTML = '<i class="ph-duotone ph-code"></i>'),
          e.getAttribute("data-blacklist") || null),
        a = (a && a.split(",")) || null,
        a =
          ((n = e.innerHTML),
          (s = a),
          (n = (n = n
            .replace(/\r/g, "")
            .replace(/\t/g, "  ")
            .replace(/^ *\n+/, "\n")
            .replace(/[\s\n]+$/, "")).replace(
            new RegExp("\\n" + n.match(/^\n( *)/)[1], "g"),
            "\n"
          )),
          (n = s
            ? n.replace(/class="([^"]+)"/g, function (e, l) {
                for (
                  var c,
                    a = l
                      .replace(/^\s+|\s+$/, "")
                      .replace(/\s+/g, " ")
                      .split(" "),
                    n = 0,
                    t = s.length;
                  n < t;
                  n++
                )
                  -1 !== (c = a.indexOf(s[n])) && a.splice(c, 1);
                return 'class="' + a.join(" ") + '"';
              })
            : n)
            .replace(/\s+class=""/gi, "")
            .replace(/([a-z]+)=""/gi, "$1")
            .replace(/javascript:void\(0\)/g, "#")
            .replace(/^\n/, "")),
        n = hljs.highlight("html", a).value,
        t = null,
        a =
          (i(l, a).on("success", function (e) {
            t && (clearTimeout(t), (t = null)),
              (l.className = l.className.replace(" copied", "")),
              (l.className += " copied"),
              (t = setTimeout(function () {
                l.className = l.className.replace(" copied", "");
              }, 1e3));
          }),
          document.createElement("div"));
      (a.className = "pc-modal-content"),
        (a.innerHTML =
          '<pre><code class="hljs html xml">' + n + "</code></pre>"),
        a.appendChild(l),
        a.appendChild(c),
        e.appendChild(a),
        (a.childNodes[0].style.display = "none"),
        c.addEventListener("click", function (e) {
          "none" == c.parentElement.childNodes[0].style.display
            ? (c.parentElement.childNodes[0].style.display = "block")
            : (c.parentElement.childNodes[0].style.display = "none");
        });
    });
})();
