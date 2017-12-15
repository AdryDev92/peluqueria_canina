// Based On
var basedon = new Bloodhound({
    local: [ {value: 'All'}, {value: 'Android'}, {value: 'Arch'}, {value: 'CentOS'}, {value: 'CRUX'}, {value: 'Debian'}, {value: 'Debian (Stable)'}, {value: 'Debian (Testing)'}, {value: 'Debian (Unstable)'}, {value: 'Fedora'},{value: 'FreeBSD'},{value: 'Gentoo'},{value: 'Independent'},{value: 'KDE neon'},{value: 'KNOPPIX'},{value: 'LFS'},{value: 'Mageia'},{value: 'Mandriva'},{value: 'Manjaro'},{value: 'openSUSE'},{value: 'PCLinuxOS'},{value: 'Puppy'},{value: 'Red Hat'},{value: 'rPath'},{value: 'sidux'},{value: 'Slackware'},{value: 'SliTaz'},{value: 'Solaris'},{value: 'Ubuntu'},{value: 'Ubuntu (LTS)'},{value: 'Tiny Core'}],
    datumTokenizer: function(d) {
        return Bloodhound.tokenizers.whitespace(d.value);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace
});

basedon.initialize();

$('#inputBasedOn').tokenfield({
    typeahead: [null, {
        source: basedon.ttAdapter(),
        displayKey: 'value' }]
});

// Origin
var origin = new Bloodhound({
    local: [ {value:"Global"}, {value:"Argelia"}, {value:"Argentina"}, {value:"Australia"}, {value:"Austria"}, {value:"Bélgica"}, {value:"Bután"}, {value:"Bosnia Herzegovina"}, {value:"Brasil"}, {value:"Camboia"}, {value:"Canadá"}, {value:"Chile"}, {value:"China"}, {value:"Cuba"}, {value:"República Checa"}, {value:"Dinamarca"}, {value:"Ecuador"}, {value:"Egipto"}, {value:"Finlandia"}, {value:"Francia"}, {value:"Alemania"}, {value:"Grecia"}, {value:"Guatemala"}, {value:"Hong Kong"}, {value:"Hungria"}, {value:"India"}, {value:"Indonesia"}, {value:"Irán"}, {value:"Irlanda"}, {value:"Isla de Man"}, {value:"Israel"}, {value:"Italia"}, {value:"Japón"}, {value:"Jordania"}, {value:"Letonia"}, {value:"Lituania"}, {value:"Malaisia"}, {value:"Malta"}, {value:"México"}, {value:"Mongolia"}, {value:"Nepal"}, {value:"Holanda"}, {value:"Nueva Zelanda"}, {value:"Nigeria"}, {value:"Noruega"}, {value:"Omán"}, {value:"Perú"}, {value:"Filipinas"}, {value:"Polonia"}, {value:"Portugal"}, {value:"Puerto Rico"}, {value:"Reunión"}, {value:"Rumania"}, {value:"Rusia"}, {value:"Serbia"}, {value:"Singapur"}, {value:"Eslovaquia"}, {value:"Eslovenia"}, {value:"Sudáfrica"}, {value: "Corea del Norte"}, {value:"Corea del Sur"}, {value:"España"}, {value:"Sri Lanka"}, {value:"Suecia"}, {value:"Suiza"}, {value:"Taiwán"}, {value:"Tailandia"}, {value:"Turquía"}, {value:"Ukrania"}, {value:"Emiratos Árabes Unidos"}, {value:"Reino Unido"}, {value:"USA"}, {value:"Venezuela"}, {value:"Vietnam"}
    ],
    datumTokenizer: function(d) {
        return Bloodhound.tokenizers.whitespace(d.value);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace
});

origin.initialize();

$('#inputOrigin').tokenfield({
    typeahead: [null, {
        source: origin.ttAdapter(),
        displayKey: 'value' }]
});

// Architecture
var arch = new Bloodhound({
    local: [ {value: "All"}, {value: "acorn26"}, {value: "acorn32"}, {value: "alpha"}, {value: "amiga"}, {value: "arc"}, {value: "arm"}, {value: "armv5tel"}, {value: "arm64"}, {value: "armel"}, {value: "armhf"}, {value: "atari"}, {value: "cats"}, {value: "cobalt"}, {value: "dreamcast"}, {value: "emips"}, {value: "evbarm"}, {value: "evbmips"}, {value: "evbppc"}, {value: "evbsh3"}, {value: "ews4800mips"}, {value: "hp300"}, {value: "hp700"}, {value: "hpcarm"}, {value: "hpcmips"}, {value: "hpcsh"}, {value: "hppa"}, {value: "i386"}, {value: "i486"}, {value: "i586"}, {value: "i686"}, {value: "ia64"}, {value: "ibmnws"}, {value: "ix86"}, {value: "luna68k"}, {value: "m68010"}, {value: "m68k"}, {value: "mips"}, {value: "mipsco"}, {value: "mipsel"}, {value: "mvme68k"}, {value: "mvmeppc"}, {value: "news68k"}, {value: "newsmips"}, {value: "ns32k"}, {value: "ofppc"}, {value: "pmax"}, {value: "powerpc"}, {value: "ppc64"}, {value: "ppc64el"}, {value: "prep"}, {value: "ps2"}, {value: "ps3"}, {value: "s390"}, {value: "s390x"}, {value: "sandpoint"}, {value: "sgimips"}, {value: "sh3eb"}, {value: "sh3el"}, {value: "sh5"}, {value: "shark"}, {value: "sparc32"}, {value: "sparc64"}, {value: "sun2"}, {value: "sun3"}, {value: "vax"}, {value: "x68k"}, {value: "x86_64"}, {value: "xbox"}, {value: "zaurus"}
    ],
    datumTokenizer: function(d) {
        return Bloodhound.tokenizers.whitespace(d.value);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace
});

arch.initialize();

$('#inputArchitecture').tokenfield({
    typeahead: [null, {
        source: arch.ttAdapter(),
        displayKey: 'value' }]
});

// Desktop
var desktop = new Bloodhound({
    local: [{value: 'All'},{value: 'Sin Escritorio'},{value: 'AfterStep'},{value: 'Android'},{value: 'Awesome'},{value: 'Blackbox'},{value: 'bspwm'},{value: 'Budgie'},{value: 'Cinnamon'},{value: 'Consort'}, {value: 'Deepin'},{value: 'dwm'},{value: 'Enlightenment'},{value: 'Equinox'},{value: 'Firefox'},{value: 'Fluxbox'},{value: 'flwm'},{value: 'FVWM'},{value: 'GNOME'},{value: 'Hackedbox'},{value: 'i3'},{value: 'IceWM'}, {value: 'ion'},{value: 'JWM'},{value: 'KDE'},{value: 'KDE Plasma'},{value: 'Kodi (XBMC)'},{value: 'Lesstif'},{value: 'Lumina'},{value: 'LXDE'},{value: 'LXQt'},{value: 'MATE'},{value: 'Maynard'},{value: 'Metacity'}, {value: 'Unity'},{value: 'WebUI'},{value: 'WMaker'},{value: 'WMFS'},{value: 'WMI'},{value: 'Xfce'}],
    datumTokenizer: function(d) {
        return Bloodhound.tokenizers.whitespace(d.value);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace
});

desktop.initialize();

$('#inputDesktop').tokenfield({
    typeahead: [null, {
        source: desktop.ttAdapter(),
        displayKey: 'value' }]
});

//
var categories = new Bloodhound({
    local: [{value: "All"}, {value: "Beginners"}, {value: "Clusters"}, {value: "Data Rescue"}, {value: "Desktop"}, {value: "Disk Management"}, {value: "Docker"}, {value: "Education"}, {value: "Firewall"}, {value: "Forensics"}, {value: "Free Software"}, {value: "Gaming"}, {value: "High Performance Computing"}, {value: "Live Medium"}, {value: "Multimedia"}, {value: "MythTV"}, {value: "NAS"}, {value: "Netbooks"}, {value: "Old Computers"}, {value: "Privacy"}, {value: "Raspberry Pi"}, {value: "Scientific"}, {value: "Server"}, {value: "Security"}, {value: "Source-based"}, {value: "Specialist"}, {value: "Telephony"}, {value: "Thin Client"}],
    datumTokenizer: function(d) {
        return Bloodhound.tokenizers.whitespace(d.value);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace
});

categories.initialize();

$('#inputCategory').tokenfield({
    typeahead: [null, {
        source: categories.ttAdapter(),
        displayKey: 'value' }]
});