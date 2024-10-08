<style>
    /* General styles */
   
    h1 {
        font-family: Verdana;
        font-weight: normal;
        color: #024457;
    }

    h1 span {
        color: #167F92;
    }

    /* Table styles */
    .responstable {
        margin: 1em 0;
        width: 100%;
        overflow: hidden;
        background: #FFF;
        color: #024457;
        border-radius: 10px;
        border: 1px solid #000000;
    }

    .responstable tr {
        border: 1px solid #D9E4E6;
    }

    .responstable tr:nth-child(odd) {
        background-color: #EAF3F3;
    }

    .responstable th {
        display: none;
        border: 2px solid #FFF;
        background-color: #167F92;
        color: #FFF;
        padding: 1em;
    }

    .responstable th:first-child {
        display: table-cell;
        text-align: center;
    }

    .responstable th:nth-child(2) {
        display: table-cell;
    }

    .responstable th:nth-child(2) span {
        display: none;
    }

    .responstable th:nth-child(2):after {
        content: attr(data-th);
    }

    @media (min-width: 480px) {

        .responstable th,
        .responstable td {
            display: table-cell;
            padding: 1em;
        }

        .responstable th:nth-child(2) span {
            display: block;
        }

        .responstable th:nth-child(2):after {
            display: none;
        }
    }

    .responstable td {
        /* display: block; */
        word-wrap: break-word;
        max-width: 7em;
    }

    .responstable td:first-child {
        display: table-cell;
        text-align: center;
        border-right: 1px solid #D9E4E6;
    }

    @media (min-width: 480px) {
        .responstable td {
            border: 1px solid #D9E4E6;
        }
    }

    .responstable th,
    .responstable td {
        text-align: left;
        margin: .5em 1em;
    }
</style>