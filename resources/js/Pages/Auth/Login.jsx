import { useEffect } from 'react';
import { Grid, Paper, Box, TextField, Button, Typography, Stack } from '@mui/material';
import { createTheme, ThemeProvider } from '@mui/material/styles';
import { useForm } from '@inertiajs/react';

export default function Login() {   

    const theme = createTheme({
        palette: {
            primary: {
                main: '#E1C340',
                contrastText: '#fff',
            },
        },
    });        

const { data, setData, post, processing, errors, reset } = useForm({
    email: '',
    password: '',
    remember: '',
});

useEffect(() => {
    return () => {
        reset('password');
    };
}, []);

const handleOnChange = (event) => {
    setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
};

const submit = (e) => {
    e.preventDefault();

    post(route('login'));
};

    return (
        <div style={{
            width: '100vw',
            height: '100vh',
            backgroundImage: "url('../../../public/Desktop_1.png')",
            backgroundRepeat: 'no-repeat',
            backgroundSize: 'cover',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'center',
        }}>
            <Box
                sx={{
                    display: 'flex',
                    flexWrap: 'wrap',
                    justifyContent: 'center',
                    alignItems: 'center',
                    '& > :not(style)': {
                        mt: 1,
                        width: { xs: '70vw', sm: '60vw', lg: '30vw' },
                        height: { xs: '80vh', sm: '70vh', md: '90vh', lg: '70vh' },
                    },
                }}
            >
                <Paper sx={{ paddingTop: '50px' }}>
                    <Stack justifyContent={'center'} alignItems={'center'} width={'100%'} padding={'0px 20px 0px 20px'}>
                        <img src="../../../public/logo.svg" />
                    </Stack>
                    <Grid container sx={{ padding: { xs: '20px', sm: '50px' } }} spacing={3}>
                        <Grid item xs={12}>
                            <ThemeProvider theme={theme}>
                                <TextField
                                    fullWidth
                                    value={data.email}
                                    type="email"
                                    name="email"
                                    sx={{
                                        "& .MuiFilledInput-input": { border: '2px solid #E1C340', borderRadius: 1, backgroundColor: 'white' }
                                    }}
                                    InputProps={{ disableUnderline: true, color: 'primary' }}
                                    label="Digite seu email"
                                    variant="filled"
                                    onChange={(e)=> handleOnChange(e)}
                                />
                            </ThemeProvider>
                        </Grid>
                        <Grid item xs={12}>
                            <ThemeProvider theme={theme}>
                                <TextField
                                    fullWidth
                                    value={data.password}
                                    type="password"
                                    name="password"
                                    sx={{
                                        "& .MuiFilledInput-input": { border: '2px solid #E1C340', borderRadius: 1, backgroundColor: 'white' }
                                    }}
                                    InputProps={{ disableUnderline: true, color: 'primary' }}
                                    label="Senha"
                                    variant="filled"
                                    onChange={(e)=> handleOnChange(e)}
                                />
                            </ThemeProvider>
                        </Grid>
                        <Grid item xs={12} margin={{ xs: '10px 0px 0px 0px', sm: '10px 0px 20px 0px' }}>
                            <Button
                                fullWidth
                                variant='contained'
                                sx={{
                                    backgroundColor: "#E1C340",
                                    color: 'black',
                                    fontSize: '15px',
                                    fontWeight: '500',
                                    textTransform: 'none',
                                    '&:hover': {
                                        backgroundColor: '#FED656'
                                    }
                                }}
                                onClick={(e)=> submit(e)}
                            >
                                Entrar na plataforma
                            </Button>
                        </Grid>
                        <Grid item xs={12}>
                            <Stack spacing={2}>
                                <Stack sx={{
                                    display: 'flex',
                                    flexDirection: 'row',
                                    alignItems: 'center',
                                    justifyContent: 'center',
                                    color: '#7C7C8A',
                                    cursor: 'pointer',
                                    '&:hover': {
                                        color: '#000'
                                    }
                                }}
                                onClick={()=> handleForgotPassword()}
                                >
                                    <Typography sx={{ fontSize: "17px", textAlign: 'center', textDecoration: 'underline' }}>
                                        Esqueceu sua senha?
                                    </Typography>
                                </Stack>
                                <Stack sx={{
                                    display: 'flex',
                                    flexDirection: 'row',
                                    alignItems: 'center',
                                    justifyContent: 'center',
                                    color: '#7C7C8A',
                                    cursor: 'pointer',
                                    '&:hover': {
                                        color: '#000'
                                    }
                                }}
                                onClick={()=> handleCreateAccount()}
                                >
                                    <Typography sx={{ fontSize: "17px", textAlign: 'center', textDecoration: 'underline', }}>
                                        Não possui conta? Crie uma agora
                                    </Typography>
                                </Stack>
                            </Stack>
                        </Grid>
                    </Grid>
                </Paper>
            </Box>
        </div >
    );
}